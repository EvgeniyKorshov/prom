import './App.css';
import React, { Component } from 'react'

export default class Message extends Component {
  render() {
    return (
        <div className="Message-color">
          By {this.props.name}
        </div>
    )
  }
}

Message.defaultProps = {name: "Evgeniy"};