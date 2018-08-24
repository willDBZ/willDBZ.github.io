spriteList = [];
window.onload = function()
{
    generalTick();
}

function generalTick()
{
    for (let i = 0; i < spriteList.length; i++)
    {
        var alive = spriteList[i].tick();
        if (!alive)
        {
            spriteList.splice(i,1);
        }
    }

    window.requestAnimationFrame(generalTick);
}