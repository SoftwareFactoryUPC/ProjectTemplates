Game=function(game){}

//Particle to Emit
CustomParticle = function (game, x, y)
{
    Phaser.Particle.call(this, game, x, y, game.cache.getBitmapData('CustomParticle'));
};
CustomParticle.prototype = Object.create(Phaser.Particle.prototype);
CustomParticle.prototype.constructor = CustomParticle;

Game.prototype=
{
    create:function()
    {
        //Misc
        this.game.stage.backgroundColor = "#AAAAAA";
        this.shiftKey=this.game.input.keyboard.addKey(Phaser.KeyCode.SHIFT);
        this.controlKey=this.game.input.keyboard.addKey(Phaser.KeyCode.CONTROL);
        this.qKey=this.game.input.keyboard.addKey(Phaser.KeyCode.Q);
        this.qKey.onDown.add(function()
        {
            this.game.state.start("Smoke");
        }, this);
        
        //Particle Emitter
        this.particleEmitter = this.state.game.add.emitter(this.game.world.centerX, this.game.world.centerY, 100);
        this.particleEmitter.particleClass = CustomParticle;
        this.particleEmitter.makeParticles();
        this.game.input.onDown.add(this.emitParticles, this);
    },
    
    emitParticles:function(e)
    {
        if(this.controlKey.isDown)
        {
            //Relocate Emitter
            this.particleEmitter.x=e.x;
            this.particleEmitter.y=e.y;
        }
        
        if(this.shiftKey.isDown)
        {
            //Burst Emit
            this.particleEmitter.start(true, 800, null, 10);
        }
        else
        {
            //Frequency Emit
            this.particleEmitter.start(false, 800, 100, 10);
        }
    }
}