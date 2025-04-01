import { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import { useNavigate } from "react-router";

const Login = () => {
    const [userData, setUserData] = useState({
        email: "",
        password: "",
    });
    const [errors, setError] = useState({
        email: "",
        password: "",
    });
    const hadleEnteredData = (e) => {
        setUserData({ ...userData, [e.target.name]: e.target.value })
        setError({ ...errors, [e.target.name]: (e.target.value.length == 0) ? `${e.target.name} Is Required` : (e.target.name == "email") ? (!(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(e.target.value))) ? 'Email Not Valid' : '' : (e.target.name == "password") ? (!(/^[A-Za-z]{3,}[.$_@#]{1,}[A-Za-z]{0,}$/i.test(e.target.value))) ? 'Password Must Start with 3 or more character and at least one special character' : '' :'' });

    }
    const navigate = useNavigate();
    const handleSubmit = (e) => {
        e.preventDefault();
        // navigate('/login');
    }
    // fetch('http://127.0.0.1:8000/api/register/', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/json' },
    //     body: JSON.stringify(userData),
    // })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.message === 'User created successfully') {
    //             history.push('/login');
    //         }
    //     })
    //     .catch(error => setError("Something went wrong!"));

    return (
        <>
            <div className="parent" style={{ height: '800px' }}>
                <Container style={{ height: '100%' }}>
                    <div className="d-flex flex-column justify-content-center align-items-center" style={{ height: '100%' }}>
                        <h1 className="p-3">Login Now</h1>
                        <form className="col-4" onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label className="form-label">Email address</label>
                                <input
                                    type="email"
                                    className={`form-control ${(errors.email) ? 'is-invalid' : ''} `}
                                    value={userData.email}
                                    onChange={hadleEnteredData}
                                    name="email"
                                />
                                {(errors?.email) ?
                                    <small id="fileHelpId" class="form-text text-danger fw-bolder text-capitalize">{errors.email}</small>
                                    : ''
                                }
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Password</label>
                                <input
                                    type="password"
                                    className={`form-control ${(errors.password) ? 'is-invalid' : ''} `}
                                    value={userData.password}
                                    onChange={hadleEnteredData}
                                    name="password"
                                />
                                {(errors?.password) ?
                                    <small id="fileHelpId" class="form-text text-danger fw-bolder text-capitalize">{errors.password}</small>
                                    : ''
                                }
                            </div>
                            <button type="submit" className="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </Container>
            </div>
        </>
    )
}
export default Login;