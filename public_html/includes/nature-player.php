<?php
/**
 * Glamp Inn Valley - Ambient Music Toggle
 * Plays "Sunny Valley" (gentle fingerpicked acoustic music) in the background.
 * Displays clear Music ON (musical note) and Music OFF (slashed musical note) icons.
 * Allows visitors to toggle music on/off anytime with 1 tap.
 */
?>
<!-- Ambient Music Note Toggle Widget -->
<aside id="givAudioWidget" class="giv-audio-widget" aria-label="Background music controller" role="region">
  <!-- HTML5 Audio Element with Sunny Valley -->
  <audio id="givBgAudio" 
         src="assets/audio/somewhere-sunny.mp3" 
         autoplay 
         preload="auto" 
         loop 
         playsinline 
         webkit-playsinline="true"></audio>

  <!-- Music ON / OFF Toggle Button -->
  <button type="button" 
          id="givAudioBtn" 
          class="giv-music-btn is-off" 
          aria-label="Turn music on" 
          title="Music OFF (Click to play)">

    <!-- Music ON Icon (Beamed musical note in gold) -->
    <span class="giv-note-icon giv-note-on" aria-hidden="true">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
        <path d="M19 3H10a1 1 0 0 0-1 1v12.2A3.8 3.8 0 0 0 7 16c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4v-9h6v4.2a3.8 3.8 0 0 0-2-.2c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4V4a1 1 0 0 0-1-1z"/>
      </svg>
    </span>

    <!-- Music OFF Icon (Musical note with red diagonal slash) -->
    <span class="giv-note-icon giv-note-off" aria-hidden="true">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
        <!-- Musical note shape -->
        <path d="M19 3H10a1 1 0 0 0-1 1v12.2A3.8 3.8 0 0 0 7 16c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4v-9h6v4.2a3.8 3.8 0 0 0-2-.2c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4V4a1 1 0 0 0-1-1z" fill="rgba(241, 233, 218, 0.45)"/>
        <!-- Red diagonal strike line -->
        <line x1="3" y1="3" x2="21" y2="21" stroke="#ef4444" stroke-width="2.4" stroke-linecap="round"/>
      </svg>
    </span>

    <!-- Golden Pulse Ring when Playing -->
    <span class="giv-music-ring" aria-hidden="true"></span>
  </button>
</aside>

<style>
/* Floating Music Toggle Widget Container */
.giv-audio-widget {
  position: fixed;
  bottom: clamp(16px, 2.5vw, 24px);
  left: clamp(16px, 2.5vw, 24px);
  z-index: 68;
  user-select: none;
  -webkit-user-select: none;
}

/* Circular Floating Button */
.giv-music-btn {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(14, 28, 30, 0.94);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1.5px solid rgba(217, 169, 98, 0.4);
  color: var(--color-accent-gold, #dfb265);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  padding: 0;
  position: relative;
  outline: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-touch-callout: none;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.45), 0 0 14px rgba(217, 169, 98, 0.15);
  transition: transform 0.25s cubic-bezier(0.2, 0.8, 0.2, 1), border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
}

.giv-music-btn:hover {
  transform: scale(1.1);
  border-color: rgba(217, 169, 98, 0.85);
  box-shadow: 0 10px 28px rgba(0, 0, 0, 0.55), 0 0 20px rgba(217, 169, 98, 0.35);
}

.giv-music-btn:active {
  transform: scale(0.94);
}

.giv-music-btn:focus-visible {
  outline: 2px solid var(--color-accent-gold, #dfb265);
  outline-offset: 4px;
}

/* Icon Toggling (Music ON vs Music OFF) */
.giv-note-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  transition: opacity 0.25s ease, transform 0.25s ease;
}

/* When Music is OFF */
.giv-music-btn.is-off .giv-note-on {
  display: none;
}
.giv-music-btn.is-off .giv-note-off {
  display: flex;
}
.giv-music-btn.is-off {
  border-color: rgba(241, 233, 218, 0.25);
  background: rgba(14, 28, 30, 0.90);
}

/* When Music is ON */
.giv-music-btn.is-on .giv-note-on {
  display: flex;
  color: #dfb265;
  animation: givNoteFloat 2.8s ease-in-out infinite alternate;
}
.giv-music-btn.is-on .giv-note-off {
  display: none;
}
.giv-music-btn.is-on {
  border-color: rgba(217, 169, 98, 0.8);
  background: rgba(18, 36, 39, 0.96);
  box-shadow: 0 8px 26px rgba(0, 0, 0, 0.5), 0 0 18px rgba(217, 169, 98, 0.3);
}

@keyframes givNoteFloat {
  0% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-1px) rotate(3deg); }
  100% { transform: translateY(0) rotate(-2deg); }
}

/* Subtle Golden Pulse Ring when Music is ON */
.giv-music-ring {
  position: absolute;
  inset: -3px;
  border-radius: 50%;
  border: 1.2px solid rgba(217, 169, 98, 0.5);
  opacity: 0;
  pointer-events: none;
}

.giv-music-btn.is-on .giv-music-ring {
  animation: givMusicPulse 2.4s cubic-bezier(0.2, 0.8, 0.2, 1) infinite;
}

@keyframes givMusicPulse {
  0% { transform: scale(0.94); opacity: 0.8; }
  100% { transform: scale(1.36); opacity: 0; }
}

/* Mobile Screens */
@media (max-width: 640px) {
  .giv-audio-widget {
    bottom: 14px;
    left: 14px;
  }
  .giv-music-btn {
    width: 40px;
    height: 40px;
  }
}
</style>

<script>
(function() {
  // Volume: subtle, relaxing, luxury glamping atmosphere (20%)
  const TARGET_VOLUME = 0.20;

  const audio = document.getElementById('givBgAudio');
  const btn = document.getElementById('givAudioBtn');
  if (!audio || !btn) return;

  // Restore playback position across page navigation
  const savedPos = sessionStorage.getItem('giv_audio_time');
  if (savedPos && !isNaN(parseFloat(savedPos))) {
    try {
      audio.currentTime = parseFloat(savedPos);
    } catch(e) {}
  }

  // Continuously record position so navigation continues seamlessly
  function recordPosition() {
    if (audio && !isNaN(audio.currentTime) && audio.currentTime > 0) {
      sessionStorage.setItem('giv_audio_time', audio.currentTime.toFixed(2));
    }
  }
  audio.addEventListener('timeupdate', recordPosition);
  window.addEventListener('beforeunload', recordPosition);
  window.addEventListener('pagehide', recordPosition);

  // UI State Updaters
  function setMusicOnUI() {
    btn.classList.remove('is-off');
    btn.classList.add('is-on');
    btn.setAttribute('aria-label', 'Turn music off');
    btn.setAttribute('title', 'Music ON (Click to mute)');
  }

  function setMusicOffUI() {
    btn.classList.remove('is-on');
    btn.classList.add('is-off');
    btn.setAttribute('aria-label', 'Turn music on');
    btn.setAttribute('title', 'Music OFF (Click to play)');
  }

  // Audio Event Listeners to keep icon state 100% synchronized
  audio.addEventListener('playing', setMusicOnUI);
  audio.addEventListener('pause', () => {
    if (audio.paused) setMusicOffUI();
  });

  // Check if visitor explicitly turned music off previously in this session
  const isManuallyMuted = sessionStorage.getItem('giv_music_manual_off') === '1';

  // Master function to play music
  function playMusic() {
    if (sessionStorage.getItem('giv_music_manual_off') === '1') {
      setMusicOffUI();
      return;
    }

    audio.volume = TARGET_VOLUME;
    audio.muted = false;

    const playPromise = audio.play();
    if (playPromise !== undefined) {
      playPromise.then(() => {
        // Direct playback succeeded: show Music ON icon
        setMusicOnUI();
      }).catch(() => {
        // Browser blocked unmuted autoplay prior to user interaction:
        // Show Music OFF icon and wait for first ambient touch/click anywhere on page
        setMusicOffUI();
        armInteractionUnlock();
      });
    }
  }

  function pauseMusic() {
    sessionStorage.setItem('giv_music_manual_off', '1');
    audio.pause();
    setMusicOffUI();
  }

  // Toggle button click: user explicitly turns music ON or OFF
  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    if (!audio.paused && !audio.muted) {
      // User turned music OFF
      pauseMusic();
    } else {
      // User turned music ON
      sessionStorage.removeItem('giv_music_manual_off');
      audio.muted = false;
      audio.volume = TARGET_VOLUME;
      audio.play().then(setMusicOnUI).catch(() => {});
    }
  });

  // Ambient interaction unlock:
  // If the browser held initial autoplay, the very first touch/click anywhere on the page
  // immediately plays the music and switches the icon to Music ON!
  let unlockArmed = false;
  function armInteractionUnlock() {
    if (unlockArmed || sessionStorage.getItem('giv_music_manual_off') === '1') return;
    unlockArmed = true;

    const events = ['pointerdown', 'touchstart', 'mousedown', 'keydown', 'click'];
    function unlock() {
      events.forEach(evt => {
        window.removeEventListener(evt, unlock, { passive: true, capture: true });
        document.removeEventListener(evt, unlock, { passive: true, capture: true });
      });

      if (sessionStorage.getItem('giv_music_manual_off') === '1') return;

      audio.muted = false;
      audio.volume = TARGET_VOLUME;
      audio.play().then(setMusicOnUI).catch(() => {});
    }

    events.forEach(evt => {
      window.addEventListener(evt, unlock, { once: true, passive: true, capture: true });
      document.addEventListener(evt, unlock, { once: true, passive: true, capture: true });
    });
  }

  // Attempt autoplay immediately on load
  if (!isManuallyMuted) {
    playMusic();
  } else {
    setMusicOffUI();
  }

  // Retry on DOM ready and window load if still paused
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      if (audio.paused && sessionStorage.getItem('giv_music_manual_off') !== '1') {
        playMusic();
      }
    });
  }
  window.addEventListener('load', () => {
    if (audio.paused && sessionStorage.getItem('giv_music_manual_off') !== '1') {
      playMusic();
    }
  });
})();
</script>
