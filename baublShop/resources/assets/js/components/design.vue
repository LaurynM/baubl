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

    </div> <!-- close container -->
</template>

<script>
var questions = {
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
var list = Object.getOwnPropertyNames(questions);


function design(jewelry){
    if (jewelry === 'necklaces'){
        $.each(questions, function( key, value ) {
            $('.question').append(`<p hidden class="${key}">${key}</p>`);
            $.each(value, function( option, description ) {
                $(`p.${key}`).append(`
                <div hidden class="col opt animated zoomIn ${key}" data-opt="${option}">
                    <div class="choice">${option} : ${description}</div>
                </div>
                `);
            });
        });
    var start = list[q];
    $(`.${start}`).removeAttr('hidden');
    }
}
function finish(i){
    i.removeClass('zoomIn').addClass('zoomOut');
    i.attr('hidden', true);
}
function getQuote(){

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

                $(".choice").on("click", function(){
                    var o = $(this).parent().data('opt')
                    console.log(o + ': ' + $(this));
                    finish($( `div[data-opt=${o}]` ));
                    q += 1;
                    if (q < questions.length) {
                        $(`.${list[q]}`).attr('hidden', false);
                    } else {
                        getQuote();
                    }
                });


function next(){
    var o = $(this).parent().data('opt')
    console.log(o + ': ' + $(this));
    finish($( `div[data-opt=${o}]` ));
    q += 1;
    if (q < questions.length) {
        $(`.${list[q]}`).attr('hidden', false);
    } else {
        getQuote();
    }
}

                console.log('rendering complete!')
            })

            // $("button").click(function(){
            //     $(this).hide();
            // })

            
        }
    }
</script>