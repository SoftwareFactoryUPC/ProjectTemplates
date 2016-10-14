Preloader=function(game){}

Preloader.prototype=
{
    preload:function()
    {
        //Load Sprites
        this.game.load.image('Fire1', 'assets/fire1.png');
        this.game.load.image('Fire2', 'assets/fire2.png');
        this.game.load.image('Fire3', 'assets/fire3.png');
        this.game.load.image('Smoke', 'assets/smoke-puff.png');
        this.game.load.image('Logs', 'assets/logs.jpg');
        
        //Particle
        var bmd = this.state.game.add.bitmapData(32, 32);
        var radgrad = bmd.ctx.createRadialGradient(16, 16, 2, 16, 16, 16);
        radgrad.addColorStop(0, 'rgba(255, 255, 98, 1)');
        radgrad.addColorStop(1, 'rgba(255, 255, 98, 0)');
        bmd.context.fillStyle = radgrad;
        bmd.context.fillRect(0, 0, bmd.width, bmd.height);
        this.game.cache.addBitmapData('CustomParticle', bmd);
    },
    
    create:function()
    {
        this.game.state.start("Game");
    }
}