<?php
class Debug {
	var $sections = array();
	var $run = false;
	function addCondition($condition) {
		if($condition) $this->run = true;
	}
	function createSection($arr, $rel, $clean) {
            $this->sections[$rel] = array(
                'clean' => $clean,
                'data' => $arr
                );
	}
	function includeDependencies() {
            ?>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
            <style type="text/css">
				* {
					margin: 0;
					padding: 0;
				}
                .debugKey {
                    color: #E15314;
                }
                .debugValue {
                    color: #87D040;
                }
                a {
                    outline: none;
                }
            </style>
            <script type="text/javascript">
    
                /**************************************************************/
                /* JSTOOLS.JS                                                 */
                /**************************************************************/
                
                function createCookie(name,value,days) {
                    if (days) {
                	var date = new Date();
                	date.setTime(date.getTime()+(days*24*60*60*1000));
                	var expires = "; expires="+date.toGMTString();
                    }
                    else var expires = "";
                    document.cookie = name+"="+value+expires+"; path=/";
                }
                
                function readCookie(name) {
                    var nameEQ = name + "=";
                    var ca = document.cookie.split(';');
                    for(var i=0;i < ca.length;i++) {
                	var c = ca[i];
                	while (c.charAt(0)==' ') c = c.substring(1,c.length);
                	if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                    }
                    return null;
                }       
                
                function eraseCookie(name) {
                    createCookie(name,"",-1);
                }
                
                
                /**************************************************************/
                /* DEBUG.JS                                                   */
                /**************************************************************/
                
                jQuery(function() {
                    pageWidth = jQuery(window).width();
                    jQuery('#debug').css({
                        display:            'block',
                        overflow:           'hidden',
                        position:           'absolute',
                        left:               '0px',
                        top:                '0px',
                        width:              pageWidth+'px'
                        });
                    jQuery('#debug a').css({
                        color:              'inherit',
                        textDecoration:     'none'
                        });
                    jQuery('#debugContentWrap').css({
                        backgroundColor:    '#120F09',
                        color:              '#FFF',
                        paddingLeft:        '20px',
                        paddingBottom:      '20px',
                        display:            'none'
                        });
                    jQuery('#debugContentTab').css({
                        backgroundColor:    '#120F09',
                        color:              '#FFF',
                        width:              '100px',
                        textAlign:          'center',
                        marginLeft:         (pageWidth - 300)+'px',
                        paddingBottom:      '3px'
                        });
                    jQuery('#debugContentTab a').css({
                        color:              '#FFF',
                        textDecoration:     'none'
                        });
                    jQuery('#debugContentMenu li').css({
                        float:              'left',
                        listStyle:          'none',
                        marginRight:        '10px'
                        });
                    jQuery('#debugContentMenu').append('<br style="clear: both;" />');
                    jQuery('#debugPages').css({
                        width:              (pageWidth * 7)+'px',
                        overflow:           'hidden',
                        marginTop:          '20px'
                        });
                    jQuery('#debugPages').append('<br style="clear: both;" />');
                    jQuery('#debugPages div').css({
                        float:              'left',
                        width:              (pageWidth - 40)+'px',
                        overflow:           'hidden',
                        marginRight:        '40px'
                        });
                    
                    
                    
                    
                    
                    
                    jQuery('#debugContentTab a').click(function() {
                       jQuery('#debugContentWrap').slideToggle(500, function() {
                            if(jQuery('#debugContentWrap').css('display') == 'block') {
                                createCookie('debug', '1');
                            } else {
                                createCookie('debug', '0');
                            }
                        });
                       return false;
                    });
                    jQuery('#debugContentMenu ul li a').click(function(){
                        rel = jQuery(this).attr('rel');
                        target = jQuery("div[rel="+rel+"]");
                        target = target[0];
                        jQuery('#debugPages div').css({display: 'none'});
                        jQuery(target).css({display: 'block'});
                        createCookie('debugPage', rel);
                        return false;
                    });
                    
                    if(readCookie('debug') != null && readCookie('debug') == '1') {
                        jQuery('#debugContentWrap').css('display', 'block');
                    } else {
                        createCookie('debug', '0');
                    }
                    
                    if(readCookie('debugPage') != null) {
                        jQuery('#debugContentMenu ul li a[rel='+readCookie('debugPage')+']').click();
                    }
                    
                    jQuery('#debugPages div').each(function() {
                        targ = jQuery(this).find('pre');
                        if(targ.length > 0) {
                            targ = targ[0];
                            fullHtml = targ.innerHTML;
                            lines = fullHtml.split('\n');
                            jQuery.each(lines, function(x, y) {
                               if(/\[.*\]/.test(y)) {
                                    y = y.replace('[', '[<span class="debugKey">');
                                    y = y.replace(']', '</span>]');
                                    y = y.replace('&gt; ', '&gt; <span class="debugValue">');
                                    if(/\,/.test(y)) {
                                        y = y.replace(',', '</span>,');
                                    } else {
                                        y = y+'</span>';
                                    }
                                    lines[x] = y;
                               }
                            });
                            newHtml = lines.join("\n");
                            jQuery(this).find('pre').html(newHtml);
                        }
                    });
                });
            </script>
            <?php
	}
	function createConsole() {
            ?>
                    <div id="debug" style="display: none;">
                        <div id="debugContentWrap">
                            <div id="debugContentMenu">
                                <ul>
                                <?php foreach($this->sections as $rel => $details) { ?>
                                    <li><a href="#" rel="<?=$rel?>"><?=$details['clean']?></a></li>
                                <?php } ?>
                                </ul>
                            </div>
                        <div id="debugPages">
                        <?php foreach($this->sections as $rel => $details) { ?>
                            <div rel="<?=$rel?>">
                                <h1><?=$details['data']?></h1>
                                <pre><?php print_r($details['data']); ?></pre>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div id="debugContentTab">
                        <a href="#">Debug</a>
                    </div>
                </div>
            <?php 
	}
}
?>