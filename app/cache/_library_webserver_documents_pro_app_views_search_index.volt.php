<?php
use \Phalcon\Tag;
foreach($searchRes as $k => $val) {
    echo Tag::linkto('doc/read/'.$val->id,$val->title);
}
