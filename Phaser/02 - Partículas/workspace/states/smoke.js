Smoke=function(game){}

Smoke.prototype=
{
    create:function()
    {
        //Misc
        this.game.stage.backgroundColor = "#FFFFFF";
        this.qKey=this.game.input.keyboard.addKey(Phaser.KeyCode.Q);
        this.qKey.onDown.add(function()
        {
            this.game.state.start("Game");
        }, this);
        
        //Logs
        this.campFire=this.game.add.sprite(this.game.world.centerX, this.game.world.centerY+150, "Logs");
        this.campFire.scale.setTo(0.3);
        this.campFire.anchor.setTo(0.5);
        
        //Fire Emitter
        this.fireEmitter = this.game.add.emitter(this.game.world.centerX, this.game.world.centerY+120, 400);
        this.fireEmitter.makeParticles( [ 'Fire1', 'Fire2', 'Fire3', 'Smoke' ] );
        this.fireEmitter.gravity = -200;
        this.fireEmitter.setAlpha(1, 0, 3000);
        this.fireEmitter.setScale(0.8, 0, 0.8, 0, 3000);
        this.fireEmitter.start(false, 3000, 20);
    }
}