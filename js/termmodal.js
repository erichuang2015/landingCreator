/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//    $('#ter').on("click", function () {      
//        $('#terms').addClass("showon");
//        //Prevent scrolling page
//        $('html, body').css({
//            overflow: 'hidden',
//            height: '100%'
//        });
//
//        $('#closebtn').on("click", function () {
//            $('#terms').removeClass("showon");
//            // Release scroll  
//            $('html, body').css({
//                overflow: 'auto',
//                height: 'auto'
//            });
//        });
//
//    });


const engageModal = () => {
    $('#terms').addClass("showon");
    //Prevent scrolling page
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });

    $('#closebtn').on("click", () => {
        $('#terms').removeClass("showon");
        // Release scroll  
        $('html, body').css({
            overflow: 'auto',
            height: 'auto'
        });
    });

};
