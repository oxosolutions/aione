import React, { Component } from 'react';
class Test extends Component {
  constructor() {
    super();
    this.state = {
      data: []
    }
  }
componentDidMount() {
    let dataURL = "http://localhost/wordpress/index.php/wp-json/wp/v2/posts";
    fetch(dataURL)
      .then(res => res.json())
      .then(res => {
        this.setState({
          data: res
        })
      })
  }
render() {
    let data = this.state.data.map((data, index) => {
      return <div key={index}>
      <p><strong>Title:</strong> {data.title.rendered}</p>
      </div>
    });
return (
      <div>
        <h2>Page/Post Data</h2>
        {data}
      </div>
    )
/*const Test = (props) => (
      <div>
        <h2>Star Wars Movies</h2>
        {movies}
      </div>
  );*/
  }
}
export default Test;