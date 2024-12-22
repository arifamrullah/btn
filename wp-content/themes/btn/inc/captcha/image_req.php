<?php

include dirname(__FILE__) . "/../../../../../wp-load.php";
// Echo the image - timestamp appended to prevent caching
echo '<a href=index.php id="refreshimg" title="Click to refresh image"><img src='.get_template_directory_uri().'/inc/captcha/image.php?' . time() . ' width="132" height="46" alt="Captcha image"></a>';

?>
