<?php
$calendarId = '캘린더ID로변경하세요'; // TODO 내 캘린더 아이디로 설정

error_reporting(E_ALL); ini_set("display_errors", 1); // php 에러를 출력 하도록 합니다
require_once 'vendor/autoload.php'; // google api 로드
putenv('GOOGLE_APPLICATION_CREDENTIALS=service-account.json'); // 인증 정보 저장 파일을 환경 변수로 설정
define('SCOPES', implode(' ', array(Google_Service_Calendar::CALENDAR) )); // 구글 캘린더 접근 권한을 설정
// 구글 인증
$client = new Google_Client();
$client->setScopes(SCOPES);
$client->useApplicationDefaultCredentials();
// 캘린더 서비스 사용
$service = new Google_Service_Calendar($client);
$event = new Google_Service_Calendar_Event(array(
  'summary' => 'Google API Event Insert',
  'description' => 'A chance to hear more about Google\'s developer products.',
  'start' => array(
    'dateTime' => '2016-11-28T09:00:00-07:00', // TODO 시간을 조절하세요
    'timeZone' => 'Asia/Seoul',
  ),
  'end' => array(
    'dateTime' => '2016-11-28T17:00:00-07:00', // TODO 시간을 조절하세요
    'timeZone' => 'Asia/Seoul',
  ),
));
// 샘플 이벤트 등록
$event = $service->events->insert($calendarId, $event);
printf('Event created: %s', $event->getId());
?>
