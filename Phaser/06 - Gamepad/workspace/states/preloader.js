Preloader=function(game){}

Preloader.prototype=
{
    preload:function()
    {
        //Sprites
        this.game.load.atlasXML("Zero", "assets/Zero.png", "assets/Zero.xml");
    },
    
    create:function()
    {
        this.game.state.start("Game");
    }
}

