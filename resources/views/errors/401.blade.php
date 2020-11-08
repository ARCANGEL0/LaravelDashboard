<style>

    :root {
  box-sizing: border-box;
  cursor: default;
}

::-moz-selection {
  color: #11111b;
  background-color: #ff9aa5;
}

::selection {
  color: #11111b;
  background-color: #ff9aa5;
}
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
background: transparent;}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #ff6778;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: rgb(250, 57, 57);
}
html, body {
  width: 99.62%;
  height: 100%;
  background-color: #11111b;
  color: #ff6778;
  font-size: calc(6.4px + 0.8125vw);
}

.error-body {
  position: relative;
  width: 100%;
  height: 100%;
}
.error-body:before {
  content: '';
  position: fixed;

  width: 100%;
  height: 100%;
  background-color: #ff6778;
  mix-blend-mode: overlay;
  z-index: 1;
}
.error-body:after {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #11111b 21px, transparent 1%) center, linear-gradient(#11111b 21px, transparent 1%) center, white;
  background-size: 22px 22px;
  background-position: center;
  opacity: .2;
  z-index: 1;
}
.error-body .background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
  -webkit-filter: grayscale(1);
          filter: grayscale(1);
  mix-blend-mode: luminosity;
}
.error-body .message {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  z-index: 3;
}
.error-body .message h1 {
  position: absolute;
  top: 10%;
  left: 0%;
  width: 100%;
  font-size: 10em;
  margin: 0;
  -webkit-animation: shake 600ms ease-in-out infinite alternate;
          animation: shake 600ms ease-in-out infinite alternate;
  text-shadow: 0 0 0.07em #ff6778, -0.2em 0 2em rgba(255, 103, 120, 0.3), 0.2em 0 2em rgba(255, 103, 120, 0.3);
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.error-body .message h1:before {
  content: attr(t);
  position: absolute;
  left: 50%;
  -webkit-transform: translate(-50%, 0.34em);
          transform: translate(-50%, 0.34em);
  height: .1em;
  line-height: .5em;
  width: 100%;
  -webkit-animation: scan 500ms ease-in-out infinite alternate 344ms, glitch-anim 300ms ease-in-out infinite alternate;
          animation: scan 500ms ease-in-out infinite alternate 344ms, glitch-anim 300ms ease-in-out infinite alternate;
  overflow: hidden;
  opacity: .7;
}
.error-body .message h1:after {
  content: attr(t);
  position: absolute;
  top: -11px;
  left: 50%;
  -webkit-transform: translate(-50%, 0.34em);
          transform: translate(-50%, 0.34em);
  height: .5em;
  line-height: .1em;
  width: 100%;
  -webkit-animation: scan 665ms ease-in-out infinite alternate 354ms, glitch-anim 300ms ease-in-out infinite alternate;
          animation: scan 665ms ease-in-out infinite alternate 354ms, glitch-anim 300ms ease-in-out infinite alternate;
  overflow: hidden;
  opacity: .8;
}
.error-body .message .bottom {
  position: absolute;
  top: 65%;
  left: 0;
  width: 100%;
}
.error-body .message p, .error-body .message a {
  font-size: 2em;
  font-family: monospace;
  text-shadow: 0 0 5px #ff6778;
  -webkit-filter: blur(0.8px);
          filter: blur(0.8px);
}
.error-body .message a {
  position: relative;
  color: #ff6778;
  text-decoration: none;
  font-weight: 700;
  border: 2px solid #ff6778;
  text-transform: uppercase;
  padding: 5px 30px;
  box-shadow: inset 0 0 0 0 rgba(255, 103, 120, 0.2);
  -webkit-transition: 25ms ease-in-out all 0ms;
  transition: 25ms ease-in-out all 0ms;
  overflow: hidden;
  -webkit-animation: attn 3s ease-in-out infinite;
          animation: attn 3s ease-in-out infinite;
}
.error-body .message a:hover {
  cursor: crosshair;
  box-shadow: inset 0 -2em 0 0 rgba(255, 103, 120, 0.2);
  -webkit-transition: 225ms ease-in-out all 225ms;
  transition: 225ms ease-in-out all 225ms;
  -webkit-animation: none;
          animation: none;
}
.error-body .message a:hover:before, .error-body .message a:hover:after {
  -webkit-transform: translate(-50%, 0) scale(0, 1);
          transform: translate(-50%, 0) scale(0, 1);
}
.error-body .message a:active {
  box-shadow: inset 0 -2em 0 0 rgba(255, 103, 120, 0.5);
  -webkit-transition: 225ms ease-in-out all 225ms;
  transition: 225ms ease-in-out all 225ms;
}
.error-body .message a:before, .error-body .message a:after {
  content: '';
  position: absolute;
  left: 50%;
  -webkit-transform: translate(-50%, 0) scale(1, 1);
          transform: translate(-50%, 0) scale(1, 1);
  -webkit-transform-origin: center;
          transform-origin: center;
  background-color: #11111b;
  width: 90%;
  height: 5px;
  -webkit-transition: 225ms ease-in-out all;
  transition: 225ms ease-in-out all;
  mix-blend-mode: hard-light;
}
.error-body .message a:before {
  top: -4px;
}
.error-body .message a:after {
  bottom: -4px;
}

@-webkit-keyframes scan {
  from , 20%, 100% {
    height: 0;
    -webkit-transform: translate(-50%, 0.44em);
            transform: translate(-50%, 0.44em);
  }
  10%,15% {
    height: 1em;
    line-height: .2em;
    -webkit-transform: translate(-55%, 0.27em);
            transform: translate(-55%, 0.27em);
  }
}

@keyframes scan {
  from , 20%, 100% {
    height: 0;
    -webkit-transform: translate(-50%, 0.44em);
            transform: translate(-50%, 0.44em);
  }
  10%,15% {
    height: 1em;
    line-height: .2em;
    -webkit-transform: translate(-55%, 0.27em);
            transform: translate(-55%, 0.27em);
  }
}
@keyframe pulse {
  from {
    text-shadow: 0 0 0 #ff6778, 0 0 0 rgba(255, 103, 120, 0.3), 0 0 0 rgba(255, 103, 120, 0.3);
  }

  to {
    text-shadow: 0 0 0.07em #ff6778, -0.2em 0 2em rgba(255, 103, 120, 0.3), 0.2em 0 2em rgba(255, 103, 120, 0.3);
  }
}
@-webkit-keyframes attn {
  0%, 100% {
    opacity: 1;
  }
  30%, 35% {
    opacity: .4;
  }
}
@keyframes attn {
  0%, 100% {
    opacity: 1;
  }
  30%, 35% {
    opacity: .4;
  }
}
@-webkit-keyframes shake {
  0%, 100% {
    -webkit-transform: translate(-1px, 0);
            transform: translate(-1px, 0);
  }
  10% {
    -webkit-transform: translate(2px, 1px);
            transform: translate(2px, 1px);
  }
  30% {
    -webkit-transform: translate(-3px, 2px);
            transform: translate(-3px, 2px);
  }
  35% {
    -webkit-transform: translate(2px, -3px);
            transform: translate(2px, -3px);
    -webkit-filter: blur(4px);
            filter: blur(4px);
  }
  45% {
    -webkit-transform: translate(2px, 2px) skewY(-8deg) scale(0.96, 1);
            transform: translate(2px, 2px) skewY(-8deg) scale(0.96, 1);
    -webkit-filter: blur(0);
            filter: blur(0);
  }
  50% {
    -webkit-transform: translate(-3px, 1px);
            transform: translate(-3px, 1px);
  }
}
@keyframes shake {
  0%, 100% {
    -webkit-transform: translate(-1px, 0);
            transform: translate(-1px, 0);
  }
  10% {
    -webkit-transform: translate(2px, 1px);
            transform: translate(2px, 1px);
  }
  30% {
    -webkit-transform: translate(-3px, 2px);
            transform: translate(-3px, 2px);
  }
  35% {
    -webkit-transform: translate(2px, -3px);
            transform: translate(2px, -3px);
    -webkit-filter: blur(4px);
            filter: blur(4px);
  }
  45% {
    -webkit-transform: translate(2px, 2px) skewY(-8deg) scale(0.96, 1);
            transform: translate(2px, 2px) skewY(-8deg) scale(0.96, 1);
    -webkit-filter: blur(0);
            filter: blur(0);
  }
  50% {
    -webkit-transform: translate(-3px, 1px);
            transform: translate(-3px, 1px);
  }
}
@-webkit-keyframes glitch-anim {
  0% {
    clip: rect(9px, 9999px, 40px, 0);
  }
  10% {
    clip: rect(6px, 9999px, 38px, 0);
  }
  20% {
    clip: rect(69px, 9999px, 15px, 0);
  }
  30% {
    clip: rect(100px, 9999px, 11px, 0);
  }
  40% {
    clip: rect(30px, 9999px, 66px, 0);
  }
  50% {
    clip: rect(43px, 9999px, 31px, 0);
  }
  60% {
    clip: rect(29px, 9999px, 9px, 0);
  }
  70% {
    clip: rect(100px, 9999px, 79px, 0);
  }
  80% {
    clip: rect(31px, 9999px, 48px, 0);
  }
  90% {
    clip: rect(8px, 9999px, 50px, 0);
  }
  100% {
    clip: rect(24px, 9999px, 22px, 0);
  }
}
@keyframes glitch-anim {
  0% {
    clip: rect(9px, 9999px, 40px, 0);
  }
  10% {
    clip: rect(6px, 9999px, 38px, 0);
  }
  20% {
    clip: rect(69px, 9999px, 15px, 0);
  }
  30% {
    clip: rect(100px, 9999px, 11px, 0);
  }
  40% {
    clip: rect(30px, 9999px, 66px, 0);
  }
  50% {
    clip: rect(43px, 9999px, 31px, 0);
  }
  60% {
    clip: rect(29px, 9999px, 9px, 0);
  }
  70% {
    clip: rect(100px, 9999px, 79px, 0);
  }
  80% {
    clip: rect(31px, 9999px, 48px, 0);
  }
  90% {
    clip: rect(8px, 9999px, 50px, 0);
  }
  100% {
    clip: rect(24px, 9999px, 22px, 0);
  }
}

</style>
<section class="error-body">
	<video preload="auto" class="background" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/396624/err.mp4" autoplay muted loop></video>
	<div class="message">
		<h1 t="401">401</h1>
		<div class="bottom">
			<p></p>
			<a href="/">Retornar ao início</a>
		</div>
	</div>
</section>