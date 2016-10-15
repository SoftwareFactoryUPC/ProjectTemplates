Game=function(game){}

Game.prototype=
{
    create:function()
    {
        //Misc
        this.game.physics.startSystem(Phaser.Physics.ARCADE);
        this.game.physics.arcade.gravity.y=1000;
        
        this.loadMap();
    },
    
    update:function()
    {
        this.game.physics.arcade.collide(this.player, this.collisionLayer);
    },
    
    loadMap:function()
    {
        //Map
        this.map=this.game.add.tilemap("Map");
        this.map.addTilesetImage("tiles_spritesheet","GameTiles");
        this.collisionLayer=this.map.createLayer("collisionLayer");
        this.map.setCollisionBetween(1,169,true,"collisionLayer");
        this.collisionLayer.resizeWorld();
        
        //Player
        var playerData={map:this.map};
        this.map.objects["objectLayer"].forEach(function(element)
        {
            if(element.name == "Player")
            {
                playerData.x=element.x;
                playerData.y=element.y-40;
                return;
            }
        }, this);
        this.player=new Player(this, playerData);
    }
}