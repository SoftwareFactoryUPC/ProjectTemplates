var game=new Phaser.Game(500,500,Phaser.AUTO);

game.state.add("Preloader",Preloader);
game.state.add("Game",Game);
game.state.add("Smoke",Smoke);
game.state.start("Preloader");