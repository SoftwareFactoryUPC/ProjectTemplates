var game=new Phaser.Game(600,400,Phaser.AUTO);

game.state.add("Preloader",Preloader);
game.state.add("Game",Game);
game.state.start("Preloader");

var style={fontSize:"20px", fill:"#FFF"};