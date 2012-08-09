<?php
/* ----------------------------------------------------------------------
 * default/views/mailTemplates/instructions_html.tpl
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2009-2011 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */

print "<p>Um Ihr Passwort neu zu erstellen, kopieren Sie bitte die folgende URL in die Adresszeile Ihres Browsers:</p>";
print "<p>".$vs_password_reset_url."</p>";
print "<p>Sollten Sie kein neues Passwort angefordert haben, kontaktieren Sie uns bitte unter tabu@deutsche-kinemathek.de</p>"
print "<br />";
print "<p>Mit freundlichen Grüßen<br/>das Projektteam</p>";

print "<p>http://tabu.deutsche-kinemathek.de</p>";

print "<p>==========================</p>";

print "<p>To reset your password, copy and paste the following URL into your web browser:
print "<p>".$vs_password_reset_url."</p>";
print "<p>If you did not request your password to be reset, please contact us at tabu@deutsche-kinemathek.de.
print "<br />";
print "<p>Regards,<br/>The TABU staff</p>";
print "<br />";
print "<p>http://tabu.deutsche-kinemathek.de</p>";