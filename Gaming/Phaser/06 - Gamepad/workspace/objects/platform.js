Platform=function(state, data)
{
    //Misc
    this.state=state;
    this.game=state.game;
    
    //Create
    Phaser.Sprite.call(this, this.game, data.x, data.y, null);
    this.game.add.existing(this);
    
    this.init();
}

Platform.prototype=Object.create(Phaser.Sprite.prototype);
Platform.prototype.constructor=Platform;

Platform.prototype.init=function()
{
    this.game.physics.arcade.enable(this);
    this.body.allowGravity=false;
    this.body.immovable=true;
    this.body.setSize(120, 30, 0, 0);
    this.body.velocity.x=-250;
}

Platform.prototype.update=function()
{
    if(this.x+this.body.width<0)
    {
        this.kill();
    }
}