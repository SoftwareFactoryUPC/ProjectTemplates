Preloader=function(game){}

Preloader.prototype=
{
    preload:function()
    {
        //Load Sprites
        this.game.load.atlasXML("Zero", "assets/Zero.png", "assets/Zero.xml");
        this.game.load.image("GameTiles", "assets/tiles_spritesheet.png");
        this.game.load.tilemap("Map", "assets/map.json", null, Phaser.Tilemap.TILED_JSON);
    },
    
    create:function()
    {
        this.game.state.start("Game");
    }
}