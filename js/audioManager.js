// Audio Manager
// Clips
var audioClips = {
    "NewMsg": new Howl({
        src: ['../audio/NewMsg.mp3']
    })
};

// Play Function
function Play(clip)
{
    console.log(audioClips[clip]);
    audioClips[clip].play();
}