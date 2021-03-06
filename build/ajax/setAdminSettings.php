<?php

OCP\User::checkAdminUser();
OCP\JSON::callCheck();

$config = \OC::$server->getConfig();

$config->setAppValue('ojsxc', 'serverType', $_POST ['serverType']);
$config->setAppValue('ojsxc', 'boshUrl', trim($_POST ['boshUrl']));
$config->setAppValue('ojsxc', 'xmppDomain', trim($_POST ['xmppDomain']));
$config->setAppValue('ojsxc', 'xmppResource', trim($_POST ['xmppResource']));
$config->setAppValue('ojsxc', 'xmppOverwrite', (isset($_POST ['xmppOverwrite'])) ? $_POST ['xmppOverwrite'] : 'false');
$config->setAppValue('ojsxc', 'xmppStartMinimized', (isset($_POST ['xmppStartMinimized'])) ? $_POST ['xmppStartMinimized'] : 'false');
$config->setAppValue('ojsxc', 'xmppPreferMail', (isset($_POST ['xmppPreferMail'])) ? $_POST ['xmppPreferMail'] : 'false');

$config->setAppValue('ojsxc', 'iceUrl', trim($_POST ['iceUrl']));
$config->setAppValue('ojsxc', 'iceUsername', trim($_POST ['iceUsername']));
$config->setAppValue('ojsxc', 'iceCredential', $_POST ['iceCredential']);
$config->setAppValue('ojsxc', 'iceSecret', $_POST ['iceSecret']);
$config->setAppValue('ojsxc', 'iceTtl', $_POST ['iceTtl']);

$config->setAppValue('ojsxc', 'firefoxExtension', $_POST ['firefoxExtension']);
$config->setAppValue('ojsxc', 'chromeExtension', $_POST ['chromeExtension']);

$externalServices = array();
foreach($_POST['externalServices'] as $es) {
   if (preg_match('/^(https:\/\/)?([\w\d*][\w\d-]*)(\.[\w\d-]+)+(:[\d]+)?$/', $es)) {
      $externalServices[] = $es;
   }
}
$config->setAppValue('ojsxc', 'externalServices', implode('|', $externalServices));

echo 'true';
