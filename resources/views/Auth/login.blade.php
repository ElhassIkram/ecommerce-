<body>
	<div class="content-wrapper">
		<div class="background background-left"></div>
		<div class="background background-right"></div>
		<div class="sing-up-panel active">
    <form action="{{ route('user.login') }}" method="POST">
    @csrf
    <h1>Sign In</h1>
    <div class="input">
        <input type="text" id="signin-email" name="email" required>
        <div class="bar"></div>
        <label>Email</label>
    </div>
    <div class="input">
        <input type="password" id="signin-password" name="password" required>
        <div class="bar"></div>
        <label>Password</label>
    </div>
    <div class="button-wrapper">
        <button class="button-transparent sing-in" type="submit">Login</button>
        <button class="sing-up" type="submit">Register</button>
    </div>
</form>

		</div>
		<div class="sing-in-panel">
    <form method="POST" action="{{ route('user.store') }}">
        @csrf <!-- This adds a hidden input field with CSRF token -->
        <h1>Register</h1>
        <div class="input" style="display: inline-block;">
            <input type="text" required id="name" name="nom">
            <div class="bar"></div>
            <label>Nom</label>
        </div>
        <div class="input" style="display: inline-block;">
            <input type="text" required id="prenom" name="prenom">
            <div class="bar"></div>
            <label>Prenom</label>
        </div><br>
        <div class="input" style="display: inline-block;">
            <input type="text" required id="name" name="adresse">
            <div class="bar"></div>
            <label>Adress</label>
        </div>
        <div class="input" style="display: inline-block;">
            <input type="text" required id="prenom" name="ville">
            <div class="bar"></div>
            <label>Ville</label>
        </div>
        <div class="input">
            <input type="email" required id="email" name="email"> <!-- Added name attribute -->
            <div class="bar"></div>
            <label>Email</label>
        </div>
        <div class="input">
            <input type="tel" required id="tel" name="tel"> <!-- Changed type to tel and added name attribute -->
            <div class="bar"></div>
            <label>Numero Tel</label>
        </div>
        <div class="input">
            <input type="password" required id="password" name="password"> <!-- Added name attribute -->
            <div class="bar"></div>
            <label>Password</label>
        </div>
        <div class="button-wrapper">
            <button class="sing-in" type="submit">Register</button>
            <button class="button-transparent sing-up" type="submit">Login</button>
        </div>
    </form>
</div>
		<div class="floating-content"></div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".sing-in").click(function(e) {
	var button = $(this);

	if (button.hasClass("button-transparent")) {
		e.preventDefault();
		$(".floating-content").addClass("active");
		$(".sing-in-panel").addClass("active");
		$(".sing-up-panel").removeClass("active");
	}

});

$(".sing-up").click(function(e) {
	var button = $(this);

	if (button.hasClass("button-transparent")) {
		e.preventDefault();
		$(".floating-content").removeClass("active");
		$(".sing-in-panel").removeClass("active");
		$(".sing-up-panel").addClass("active");
	}

});
</script>

<style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans|Oswald');

/* Variables */
:root {
  --font-heading: "Oswald";
  --font-reg: "Open Sans";
  --color-primary: #209B60;
  --color-secondary: #434C5F;
  --color-third: #8cbde0;
  --color-text-primary: #DDDDDD;
  --radius: 0;
}

body,
html {
  margin: 0;
  height: 100%;
  font-family: var(--font-reg);
  font-size: 1em;
  overflow: hidden;
  background-color: var(--color-primary);
}

h1 {
  font-family: var(--font-heading);
  font-weight: 400;
  letter-spacing: 1px;
  color: var(--color-text-primary);
  margin-bottom: 55px;
  text-align: left;
}

.content-wrapper {
  position: absolute;
  width: 100%;
  height: 100%;
  box-shadow: 2px 2px 20px 0 rgba(0, 0, 0, .25);
}

.content-wrapper .background {
  width: 40%;
  height: 100%;
  position: absolute;
  background-size: cover;
  background-position: center;
}

.content-wrapper .background.background-right {
  right: 0;
}

.content-wrapper .background.background-left {
  left: 0;
}

.content-wrapper .background.background-right {
  background-image: url('/pexels-karolina-grabowska-5632379.jpg');
}

.content-wrapper .background.background-left {
  background-image: url('/pexels-karolina-grabowska-5650028.jpg');
}

.content-wrapper .sing-in-panel,
.content-wrapper .sing-up-panel {
  position: absolute;
  right: 0;
  width: 60%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  pointer-events: none;
  opacity: 0;
  visibility: hidden;
  transition: transform 0.5s cubic-bezier(0.4, 0.0, 0.2, 1), opacity 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
  z-index: 10;
}

.content-wrapper .sing-in-panel.active,
.content-wrapper .sing-up-panel.active {
  pointer-events: auto;
  opacity: 1;
  visibility: visible;
  transform: translateX(0px);
}

.content-wrapper .sing-in-panel {
  right: 0;
  transform: translateX(100px);
}

.content-wrapper .sing-up-panel {
  left: 0;
  transform: translateX(-100px);
}

.content-wrapper .floating-content {
  position: absolute;
  left: 0;
  width: 60%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  box-shadow: 0 0 30px 0 rgba(0, 0, 0, .25);
  transition: all 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
  background-color: #151922;
}

.content-wrapper .floating-content::before {
  display: block;
  content: "";
  position: absolute;
  z-index: 1;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background: #151922;
}

.content-wrapper .floating-content.active {
  margin-left: 40%;
}

/* Input */
.input {
  position: relative;
  width: 300px;
  margin-bottom: 25px;
}

.input input {
  background: transparent;
  outline: none;
  font-size: 1em;
  padding: 10px 10px 10px 5px;
  display: block;
  box-sizing: border-box;
  width: 100%;
  border: none;
  color: white;
  font-family: var(--font-reg);
  border-bottom: 1px solid var(--color-text-primary);
}

.input label {
  color: var(--color-text-primary);
  font-size: 0.85em;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  font-family: var(--font-reg);
  top: 15px;
  transition: 0.195s ease all;
  text-transform: uppercase;
}

.bar {
  position: relative;
  display: block;
  width: 0;
  height: 2px;
  width: 0;
  bottom: 1px;
  left: 0;
  background: var(--color-primary);
  transition: all 0.195s ease;
}

.input input:focus ~ .bar,
.input input:valid ~ .bar {
  width: 100%;
}

.input input:focus ~ label,
.input input:valid ~ label,
textarea:focus ~ label,
textarea:valid ~ label {
  top: -10px;
  font-size: 0.55em;
  color: var(--color-text-primary);
}

/* Buttons */
.button-square,
.button-transparent,
button {
  font-family: var(--font-heading);
  position: relative;
  display: inline-block;
  padding: 12px 25px;
  margin: 20px 0;
  background-color:#ffb524 ;
  color: var(--color-text-primary);
  border-radius: var(--radius);
  transition: all 0.3s;
  letter-spacing: 2px;
  font-weight: 700;
  font-size: 0.85em;
  outline: none;
  cursor: pointer;
  border: none;
  text-transform: uppercase;
}

.button-square:hover,
.button-transparent:hover,
button:hover {
  background-color: darken(var(--color-primary), 15%);
}

.button-transparent {
  justify-content: center;
  align-items: center;
  background-color: transparent;
}

.button-transparent:hover {
  background-color: rgba(var(--color-text-primary), .15);
}

</style>