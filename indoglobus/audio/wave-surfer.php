<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>

<!--audio controls="" preload="metadata" src="http://www.externalharddrive.com/waves/animal/bird.wav" controls="off"  ></audio-->

<div id="waveform"></div>

<div class="controls">
    <button class="btn btn-primary" onclick="wavesurfer.skipBackward()">
      <i class="fa fa-step-backward"></i>
      Backward
    </button>

    <button class="btn btn-primary" onclick="wavesurfer.playPause()">
      <i class="fa fa-play"></i>
      Play
      /
      <i class="fa fa-pause"></i>
      Pause
    </button>

    <button class="btn btn-primary" onclick="wavesurfer.skipForward()">
      <i class="fa fa-step-forward"></i>
      Forward
    </button>

    <button class="btn btn-primary" onclick="wavesurfer.toggleMute()">
      <i class="fa fa-volume-off"></i>
      Toggle Mute
    </button>
  </div>
<script>

var wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: 'violet',
    progressColor: 'purple'
});

wavesurfer.load('http://www.externalharddrive.com/waves/animal/bird.wav');

</script>