Player=function(state, data)
{
    //Misc
    this.state=state;
    this.game=state.game;
    this.xbox=data.pad;
    
    //Create
    Phaser.Sprite.call(this, this.game, data.x, data.y, "Zero");
    this.game.add.existing(this);
    this.game.physics.arcade.enable(this);
    
    //TEMP
    //this.cursors=this.game.input.keyboard.createCursorKeys();
    //this.cursors.up.onDown.add(this.jump, this);
    
    //Attributes
    this.jumping=false;
    this.executingAnimation=false
    this.currentState="Idle";
    this.anchor.setTo(0.5, 0);
    this.animations.add("Idle", Phaser.Animation.generateFrameNames("Idle", 1, 6, ".png", 2), 4, true);
    this.animations.add("Running", Phaser.Animation.generateFrameNames("Running", 3, 16, ".png", 2), 20, true);
    this.animations.add("Jumping", Phaser.Animation.generateFrameNames("Jumping", 1, 10, ".png", 2), 8, false);
    this.animations.add("Attacking", Phaser.Animation.generateFrameNames("Attack1", 1, 11, ".png", 2), 30, false).onComplete.add(function()
    {
        this.currentState="Idle";
        this.animations.play(this.currentState);
    },this);
    this.animations.play(this.currentState);
}

Player.prototype=Object.create(Phaser.Sprite.prototype);
Player.prototype.constructor=Player;

Player.prototype.update=function()
{
    if(this.x+this.width*0.5<0 || this.x-this.width>this.game.width || this.y>this.game.height)
    {
        this.game.state.start("Game");
    }
    
    if (this.xbox.connected)
    {
        var leftStickX = this.xbox.axis(Phaser.Gamepad.XBOX360_STICK_LEFT_X);
        var leftStickY = this.xbox.axis(Phaser.Gamepad.XBOX360_STICK_LEFT_Y);

        if(leftStickX && this.currentState!="Attacking")
        {
            if (leftStickX>0)
            {
                this.move(1);
            }
            else
            {
                this.move(-1);
            }
        }
        else
        {
            this.stop();
        }
        
        if(leftStickY && leftStickY<0)
        {
            this.jump();
        }
        
        if (this.xbox.justPressed(Phaser.Gamepad.XBOX360_A))
        {
            this.attack();
        }
    }
    //else
    //{
    //    //TEMP
    //    if (this.cursors.right.isDown)
    //    {
    //        this.move(1);
    //    }
    //    else if(this.cursors.left.isDown)
    //    {
    //        this.move(-1);
    //    }
    //    else
    //    {
    //        this.stop();
    //    }
    //}
    
    if(this.currentState=="Jumping" && this.body.touching.down)
    {
        this.currentState="Idle";
        this.animations.play(this.currentState);
    }
}

Player.prototype.stop=function(direction)
{
    this.body.velocity.x=0;
    if(this.currentState=="Running")
    {
        this.currentState="Idle";
        this.animations.play(this.currentState);
    }
}

Player.prototype.move=function(direction)
{
    this.body.velocity.x=180*direction;
    this.scale.setTo(direction,1);
    if(this.currentState!="Jumping")
    {
        this.currentState="Running";
        this.animations.play(this.currentState);
    }
}

Player.prototype.jump=function()
{
    if(this.currentState!="Jumping" && this.currentState!="Attacking")
    {
        this.body.velocity.y-=300;
        this.currentState="Jumping";
        this.animations.play(this.currentState);
    }
}

Player.prototype.attack=function()
{
    if(this.body.touching.down && this.currentState!="Running")
    {
        this.currentState="Attacking";
        this.animations.play(this.currentState);
    }
}