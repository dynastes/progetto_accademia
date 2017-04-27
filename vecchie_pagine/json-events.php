$year = date('Y');
$month = date('m');

echo json_encode(array(
  array(
    'id' => 111,
    'title' => "Evento 1",
    'start' => "$year-$month-10",
    'url' => "http://www.mrwebmaster.it/"
  ),
  array(
    'id' => 222,
    'title' => "Evento 2",
    'start' => "2010-04-06T13:15:30Z",
    'end' => "2010-04-06T14:15:30Z",
    'allDay' => false
  ),
  array(
    'id' => 333,
    'title' => "Evento 3",
    'start' => "$year-$month-20",
    'end' => "$year-$month-22",
    'url' => "http://www.google.it/"
  )
));
