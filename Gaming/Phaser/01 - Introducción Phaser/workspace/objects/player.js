Player=function(state, data)
{
    //Misc
    this.state=state;
    this.game=state.game;
    
    //Create
    Phaser.Sprite.call(this, this.game, data.x, data.y, data.key);
    this.game.add.existing(this);

    this.anchor.setTo(0.5);
    this.game.physics.arcade.enable(this);
    this.game.input.onDown.add(this.boost,this);
    
    this.score=0;
}

Player.prototype=Object.create(Phaser.Sprite.prototype);
Player.prototype.constructor=Player;

Player.prototype.boost=function()
{
    this.body.velocity.y=-400;
}

Player.prototype.freeze=function()
{
    this.body.velocity.x=0;
    this.body.velocity.y=0;
}