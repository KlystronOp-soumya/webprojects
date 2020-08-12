import React, { Component } from 'react'
import './contactStyle.css'

 class Contact extends Component {
     
     constructor(props) {
         super(props)
     
         this.state = {
              fullname: '',
              email: '',
              message: '',
              show:''
         }
        
     }

    handleFullNameChange = (event) =>{
        this.setState({
            fullname:event.target.value
        })
    }
    handleEmailChange =(event) =>{
        this.setState(
            {
                email:event.target.value
            }
        )
    }
    handleMessageChange =(event) =>{
        this.setState(
            {
                message:event.target.value
            }
        )
    }
  /*  handleChangeAll =(event)=>{
       this.setState(
           {
               [event.target.name]:event.target.value
           }
       )
   } */

   handleChangeAll=(event)=>
   {
       this.setState
       (
           {
               show:`${this.state.fullname} and ${this.state.email} and ${this.state.message}`
           }
       )
   }
    
    render() {
        return (
            <div>
                <form>
                    <label>Full Name</label>
                    <input type="text" name="name"value={this.state.fullname} onChange={this.handleFullNameChange} /><br/>
                    <label>Email</label>
                    <input type="email"  name="email" value={this.state.email} onChange={this.handleEmailChange} /><br/>
                    <label>Message</label>
                    <textarea name="message" value={this.state.message} onChange={this.handleMessageChange} /><br/>
                    <button type="submit" onSubmit={this.handleChangeAll} >Send</button>
                </form>
        <div>{this.showData}</div>
            </div>
        )
    }
}

export default Contact

