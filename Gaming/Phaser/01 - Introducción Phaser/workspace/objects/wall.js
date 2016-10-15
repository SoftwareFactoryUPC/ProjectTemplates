Wall=function(state)
{
    //Misc
    this.state=state;
    this.game=state.game;
    
    //Create
    Phaser.Group.call(this, this.game);
    
    var position=this.state.rnd.integerInRange(this.game.height*0.25, this.game.height*0.75);
    var opening=120;
    this.initialize(position, opening*0.5);
}

Wall.prototype=Object.create(Phaser.Group.prototype);
Wall.prototype.constructor=Wall;

Wall.prototype.initialize=function(position, opening)
{
    var lower=this.game.add.sprite(this.game.width, position+opening, "Wall");
    this.game.physics.arcade.enable(lower);
    lower.body.velocity.x=-200;
    lower.body.immovable=true;
    lower.body.allowGravity=false;
    this.add(lower);
    
    var upper=this.game.add.sprite(this.game.width, position-opening, "Wall");
    this.game.physics.arcade.enable(upper);
    upper.body.velocity.x=-200;
    upper.body.immovable=true;
    upper.body.allowGravity=false;
    upper.scale.y=-1;
    this.add(upper);
}

Wall.prototype.freeze=function()
{
    this.children[0].body.velocity.x=0;
    this.children[1].body.velocity.x=0;
}