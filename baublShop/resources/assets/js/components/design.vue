<template>
    <div class="container">

        <div class="row question">
            <div class="type col animated zoomIn" id="bracelets">
                <div class="answer">bracelets</div>
            </div>
            <div class="type col animated zoomIn" id="necklaces">
                <div class="answer">necklaces</div>
            </div>
        </div>
        <div id="email" hidden="true">your quote request has been sent. we will contact you shortly.</div>
    </div> <!-- close container -->
</template>

<script>
var nQuestions = {
    length:{
        '14"': 'collar', 
        '16"': 'choker', 
        '18"': 'princess', 
        '20"': 'matinee', 
        '24"': 'opera'},
    cord: {
        'stiff wire': 'no drape',
        'flexible wire': 'some drape',
        'silk cord': 'high drape'
    },
    value:{
        '$ economic': 'dyed stones, composite materials (ex: jade, shell, bone, wood)',
        '$$ premium': 'natural & lab-created stone, semi-precious stones (ex: amethyst, citrine)',
        '$$$ luxury': 'rare materials, large sizes, fancy cuts, precious stones (ex: ruby, emerald, sapphire)'
    },
    weight:{
        'delicate': 'one to five beads',
        'classical': 'full strand of small beads',
        'contemporary': 'small beads with large accents',
        'mod': 'large beads with small accents',
        'heavy': 'full strand of large beads'
    },
    colors: {
        'blue/purple': '$ agate, $$ amethyst, $$$ sapphire',
        'green': '$ jade, $$ amazonite, $$$ emerald, peridot',
        'red': '$ red agate, $$ coral, $$$ ruby',
        'orange/yellow': '$ carnelian, $$ citrine, $$$ orange sapphire',
        'white': '$ white jade, $$ howlite, $$$ pearl',
        'black': '$ lava rock, $$ onyx, $$$ black spinel',
        'brown/tan': '$ wood, $$ tigers eye, $$$ smoky quartz',
        'multi/rainbow': 'combination',
    }
}

var q = 0;
var nList = Object.getOwnPropertyNames(nQuestions);
var jewelrySpecs = {};


function design(jewelry){
    if (jewelry === 'necklaces'){
        $.each(nQuestions, function( key, value ) {
            $('.question').append(`<p class="${key}" hidden="hidden">${key}</p>`);
            $.each(value, function( option, description ) {
                $(`p.${key}`).append(`
                <div class="col opt animated zoomIn ${key}" data-opt="${option}" data-key="${key}">
                    <div class="choice">${option} : ${description}</div>
                </div>
                `);
            });
        });
    var start = nList[q];
    $(`.${start}`).removeAttr('hidden');
    }
}
function finish(i){
    i.removeClass('zoomIn').addClass('zoomOut');
    i.attr('hidden', true);
}



function submitOrder(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post('order', {jewelrySpecs}, function(data,status) {
     console.log(`Order Status: ${status}`);
     if (status == 'Success'){
         getQuote();
     }
 })
// $.ajax({
//     type: "POST",
//     url: '/order',
//     data: { length: jewelrySpecs.length,
//             cord: jewelrySpecs.cord,
//             value: jewelrySpecs.value,
//             weight: jewelrySpecs.weight,
//             colors: jewelrySpecs.colors,
//             _token: '{{csrf_token()}}' },
//     success: function (data) {
//        console.log(data);
//     },
//     error: function (data, textStatus, errorThrown) {
//         console.log(data);

//     },
// });
}
 function getQuote(){
 $.get('/quote', jewelrySpecs, function(data,status) {
     console.log(`Email Status: ${status}`);
 })     
}

function showView(){
    $('#email').attr('hidden', false);
}


    export default {
        mounted: function () {
            this.$nextTick(function () {
                // Code that will run only after the
                // entire view has been rendered
                $(".answer").click(function(){    
                    console.log('jewelry chosen: ' + $(this).text());
                    finish($('.type'));
                    design($(this).text());
                });
                $('.question').on('click', '.opt', function(e) {
                    var o = $(this).data('opt');
                    var k = $(this).data('key');
                    jewelrySpecs[k] = o;
                    console.log(k + ': ' + o);

                    finish($( `p[class=${k}]` ));

                    var nextQ = $(this).parent().next('p');

                    if (nextQ.length === 1) {
                        nextQ.attr('hidden', false);
                    } else {
                        // submitOrder();
                        // getQuote();
                        showView();
                    }
                });
                console.log('rendering complete!')
            })  
        }
    }
</script>