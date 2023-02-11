<?php
//
// Я хотел сделать класс который ворматирует посты и делает их более красивыми
//
class Format{
    public function formatDate($date){ //функция перезаписи даты
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textShorten($text,$limit=400){ //функция перезаписи текста а именно его сжатие по лимиту слов
        $text = $text . " ";
        $text = substr($text,0,$limit);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text . ".....";
        return $text;
    }

}


