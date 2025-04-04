import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { BrowserRouter, Route, Routes } from 'react-router'
import Register from './Pages/Register'
import Home from './Pages/Home'
import Navbar from './Components/Navbar/Navbar'
import Login from './Pages/Login'
function App() {
  const [count, setCount] = useState(0);
  return (
    <>
    <BrowserRouter>
      <Navbar/>
      <Routes>
        <Route path='/' element={<Home/>}></Route>
        <Route path='/register' element={<Register/>}></Route>
        <Route path='/login' element={<Login/>}></Route>
      </Routes>
    </BrowserRouter>
      
    </>
  )
}

export default App
