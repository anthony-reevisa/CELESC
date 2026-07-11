<?php


require 'vendor/autoload.php';


use HeadlessChromium\BrowserFactory;


function BROWSER($headless = true){
   return (new BrowserFactory())->createBrowser([
       'headless' => $headless,
   ]);
}


function PAGE($browser){
   return $browser->createPage();
}


function URL($page, $url){
   $page->navigate($url)->waitForNavigation();
}


function CLICK($page, $selector){
   while (true) {


       if ($page->evaluate("document.querySelector(" . json_encode($selector) . ") !== null")->getReturnValue()) {
           $page->mouse()->find($selector)->click();
           return;
       }


       usleep(10000);
   }
}


function SEND($page, $selector, $text){
   while (true) {


       if ($page->evaluate("document.querySelector(" . json_encode($selector) . ") !== null")->getReturnValue()) {
           $page->mouse()->find($selector)->click();
           $page->keyboard()->typeText($text);
           return;
       }


       usleep(10000);
   }
}


function SCROLL($page, $selector){
   while (true) {


       if ($page->evaluate("
           document.querySelector(" . json_encode($selector) . ") !== null
       ")->getReturnValue()) {


           $page->evaluate("
               document.querySelector(" . json_encode($selector) . ").scrollIntoView({
                   behavior: 'instant',
                   block: 'center',
                   inline: 'center'
               });
           ");


           return;
       }


       usleep(10000);
   }
}


function SCREEN($page, $file = "screenshot.png"){
   $page->screenshot()->saveToFile($file);
}
