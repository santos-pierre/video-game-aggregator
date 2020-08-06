<script>
    window.livewire.on('{{$event}}', params => {
        var progressBarContainer = document.getElementById(params.slug);

        var progressCircle = new ProgressBar.Circle(progressBarContainer,{
            color: 'white',
            strokeWidth: 6,
            trailWidth: 4,

            text: {
                autoStyleContainer: false,
            },
            duration: 2400,

            easing: 'easeOut',

            from: { color: '#48bb78', width: 6 },
            to: { color: '#48bb78', width: 6 },
                step: function(state, circle, attachment) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('0%');
                    } else {
                        circle.setText(value+'%');
                    }
                },
        });

        progressCircle.animate(params.rating);
    });
</script>