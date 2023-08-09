<?php

//Site
define(TITLE, "Sistema Especifer");
define(URL, ('http://'.$_SERVER['HTTP_HOST'].'/novo/sgr/')); 
define(EMAIL, '');
define(SS_NAME, 'casesss');
define(METAKEYWORDS, '');
define(AUTHOR, 'Fastinfo Assistencia Tecnica e Suporte Informatica - http://www.fastinfo.com.br'); 
define(LOGO, 'fastinfo.png');
define(COPYRIGHT, 'Copyright &copy; '.date('Y').' Fastinfo');

//email
define(SMTP, 'email-ssl.com.br');
define(SMTPUSER, 'sistema@oficinaonlinecase.com.br'); 
define(SMTPPASS, 'Especifer@2021');


//Banco de dados
define(DB_HOST, 'cid_tools_novo.mysql.dbaas.com.br'); 
define(DB_USER, 'cid_tools_novo');
define(DB_PASS, 'Fast@13579');
define(DB_NAME, 'cid_tools_novo');  



$VARS['STATUS'] = array(' ', 'Confirmado', 'Faltou', 'Finalizado');

?>