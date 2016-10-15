Game=function(game){}

Game.prototype=
{
    create:function()
    {
        //Misc
        this.game.stage.backgroundColor = '#736357';
        this.game.physics.startSystem(Phaser.Physics.ARCADE);
        this.game.physics.arcade.gravity.y=1000;
        
        //Gamepad
        this.game.input.gamepad.start();
        this.xbox = this.game.input.gamepad.pad1;
        this.controllerText=this.game.add.text(10, 10, "", style);
        
        //Player
        var playerData={x:450, y:160, pad:this.xbox};
        this.player=new Player(this, playerData);
        
        //Platforms
        this.platformGroup=this.game.add.group();
        this.platformGroup.timer=0;
        var platformData={x:this.player.x-10, y:this.player.y+60};
        var platform=new Platform(this, platformData);
        this.platformGroup.add(platform);
        this.platformGroup.lastY=platformData.y;
    },
    
    update:function()
    {
        this.platformGroup.timer+=this.game.time.elapsed; //Returns time elapsed since last update run (milliseconds)
        if(this.platformGroup.timer>=1200)
        {
            this.platformGroup.timer=0;
            this.spawnPlatform();
        }
        
        // Pad "connected or not" indicator
        if (this.game.input.gamepad.supported && this.game.input.gamepad.active && this.xbox.connected)
        {
            this.controllerText.text="Controller Connected";
        }
        else
        {
            this.controllerText.text="No Controller Found";
        }
        
        this.game.physics.arcade.collide(this.player, this.platformGroup);
    },
    
    render:function()
    {
        this.platformGroup.forEachAlive(function(element)
        {
            this.game.debug.body(element);
        }, this);
    },
    
    spawnPlatform:function()
    {
        var range=this.rnd.integerInRange(0, 50);
        var direction=this.rnd.integerInRange(-1, 1);
        var randomY=this.platformGroup.lastY+range*direction;
        randomY=this.game.math.max(randomY, 40);
        randomY=this.game.math.min(randomY, this.game.height-40);
        var platformData={x:this.game.width-20, y:randomY};
        
        var platform=this.platformGroup.getFirstDead();
        if(!platform)
        {
            var platform=new Platform(this, platformData);
            this.platformGroup.add(platform);
        }
        else
        {
            platform.reset(platformData.x, platformData.y);
            platform.init();
        }
    }
}