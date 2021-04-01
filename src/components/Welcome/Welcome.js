
import './Welcome.css'
const Welcome=props=>{
  return (
    <div className="title-bar hide-for-large">
    <div className="title-bar-left">
      <button className="menu-icon" type="button" data-open="my-info"></button>
      <span className="title-bar-title">{props.name} project</span>
    </div>
    </div>
  );
}

export default Welcome;
