var game=new Phaser.Game(400,600,Phaser.AUTO);

game.state.add("Preloader",Preloader);
game.state.add("Game",Game);
game.state.add("GameOver",GameOver);
game.state.start("Preloader");