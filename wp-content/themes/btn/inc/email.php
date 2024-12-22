<?php
include_once dirname(__FILE__) . "/../../../../wp-load.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Notification email template</title>
   </head>
   <body bgcolor="#d2d2d2">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#d2d2d2" style="font-family:Arial,sans-serif;font-size:12px;color:#333">
         <tbody>
            <tr>
               <td>
                  <table width="600" style="border-top: 5px solid #1f417d" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                     <tbody>
                        <tr>
                           <td colspan="2" align="center" style="padding:20px"><a href=""><img src="<?php echo get_template_directory_uri() ?>/images/logo-btn-baru.png" width="" height="" style="display:block" border="0" alt=""/></a></td>
                        </tr>
                        <tr>
                           <td colspan="2" width="100%" align="left" valign="top" style="background:#ffd42a">
                              <div style="font-family: Arial; color:#333; font-size:14px; line-height:26px;text-align:center;padding:20px;">
                                 Congratulation, your request has been approved,<br/>
                                 please download the brochure on the link below:
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2" width="100%" align="left" valign="top" style="background:#fff;padding:20px 0">
                              <div style="font-family: Arial; color:#333; font-size:13px; line-height:24px;text-align:center;padding:20px;">
                                Dear <?php echo $_GET['nama']; ?>
                                </div>
                           </td>
                        </tr>
                        <tr style="background:#e6e9ed">
                           <td width="50%" align="left" valign="top" style="font-size:11px;padding:20px;">
                              <h3 style="font-size:11px;">
                                 BTN Virtual Branch
                              </h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                           </td>
                           <td width="50%" align="left" valign="top" style="font-size:11px;padding:20px;">
                              <h3 style="font-size:11px;">BTN CARE</h3>
                              <p>For more information please visit BTN Virtual Branch site</p>
                              <p><a href="" style="color:#003380;font-style:italic">www.btnvirtualbranch.com</a></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>
