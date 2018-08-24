class JiGong
{
    constructor(x,y)
    {
        this.alive = true;
        this.node = document.createElement("img");
        this.node.src="images/jigong.png";
        this.node.width = "100";
        this.node.height = "100";
        this.x = x;
        this.y = y;
        this.sinFactor = 0;
        this.node.style.position = "absolute";
        this.node.style.left = this.x + "px";
        this.node.style.top = this.y + "px";
        this.speed = 1;
        document.body.appendChild(this.node);
    }

    tick()
    {   
        this.sinFactor += 0.05;
        this.y += 5 * Math.sin(this.sinFactor);
        console.log(this.x);
        this.node.style.left = this.x + "px";
        this.node.style.top = this.y + "px";
        return this.alive;
    }
}

