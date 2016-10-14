Preloader=function(game){}

Preloader.prototype=
{
    preload:function()
    {
        //Load Sprites
        this.game.load.spritesheet("Player","assets/player.png",48,48,4);
        this.game.load.image("Wall","assets/wall.png");
        this.game.load.image("Background","assets/background-texture.png");
        
    },
    
    create:function()
    {
        this.game.state.start("Game");
    }
}