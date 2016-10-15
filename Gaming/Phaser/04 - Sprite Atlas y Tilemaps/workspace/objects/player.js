Player=function(state, data)
{
    //Misc
    this.state=state;
    this.game=state.game;
    this.map=data.map;
    
    //Create
    Phaser.Sprite.call(this, this.game, data.x, data.y, "Zero");
    this.game.add.existing(this);
    this.game.physics.arcade.enable(this);
    this.game.camera.follow(this);
    
    this.cursors=this.game.input.keyboard.createCursorKeys();
    this.cursors.up.onDown.add(this.jump, this);
    this.zKey=this.game.input.keyboard.addKey(Phaser.Keyboard.Z);
    this.zKey.onDown.add(this.attack, this);
    
    //Attributes
    this.jumping=false;
    this.executingAnimation=false
    this.currentState="Idle";
    this.anchor.setTo(0.5, 0);
    this.animations.add("Idle", Phaser.Animation.generateFrameNames("Idle", 1, 6, ".png", 2), 4, true);
    this.animations.add("Running", Phaser.Animation.generateFrameNames("Running", 3, 16, ".png", 2), 20, true);
    this.animations.add("Jumping", Phaser.Animation.generateFrameNames("Jumping", 1, 11, ".png", 2), 12, false);
    this.animations.add("Attacking", Phaser.Animation.generateFrameNames("Attack1", 1, 11, ".png", 2), 24, false).onComplete.add(function()
    {
        this.currentState="Idle";
    },this);
    this.animations.play(this.currentState);
}

Player.prototype=Object.create(Phaser.Sprite.prototype);
Player.prototype.constructor=Player;

Player.prototype.update=function()
{
    if(this.x-this.width>this.map.widthInPixels || this.x-this.width<0 || this.y-this.height>this.map.heightInPixels)
    {
        this.game.state.start("Game");
    }
    
    if(this.currentState=="Jumping" && this.body.blocked.down)
    {
        this.currentState="Idle";
    }
    
    if(this.cursors.left.isDown)
    {
        this.body.velocity.x=-180;
        this.scale.setTo(-1,1);
        if(this.currentState!="Jumping")
        {
            this.currentState="Running";
        }
        
    }
    else if(this.cursors.right.isDown)
    {
        this.body.velocity.x=180;
        this.scale.setTo(1,1);
        if(this.currentState!="Jumping")
        {
            this.currentState="Running";
        }
    }
    else
    {
        this.body.velocity.x=0;
        if(this.currentState=="Running")
        {
            this.currentState="Idle";
        }
    }
    
    this.animations.play(this.currentState);
}

Player.prototype.jump=function()
{
    if(this.currentState!="Jumping")
    {
        this.body.velocity.y-=500;
        this.currentState="Jumping";
    }
}

Player.prototype.attack=function()
{
    if(this.body.blocked.down)
    {
        this.currentState="Attacking";
    }
}