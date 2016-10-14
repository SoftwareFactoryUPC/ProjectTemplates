var game=new Phaser.Game(500,400,Phaser.AUTO);

game.state.add("Preloader",Preloader);
game.state.add("Game",Game);
game.state.start("Preloader");