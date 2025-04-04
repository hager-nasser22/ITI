import axios from "axios";
import { useEffect, useState } from "react";
import { Container } from "react-bootstrap";
import { useNavigate } from "react-router";

const Register = () => {
    var hasError = false;
    const [userData, setUserData] = useState({
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        phone: "",
        confirmPassword: "",
    });
    const [errors, setError] = useState({
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        phone: "",
        confirmPassword: "",
    });
    const hadleEnteredData = (e) => {
        setUserData({ ...userData, [e.target.name]: e.target.value })
        setError({ ...errors, [e.target.name]: (e.target.value.length == 0) ? `${e.target.name} Is Required` : (e.target.name == "email") ? (!(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(e.target.value))) ? 'Email Not Valid' : '' : (e.target.name == "phone") ? (!(/^(?:\+20|0)?(10|11|12|15)[0-9]{8}$/i.test(e.target.value))) ? 'Phone Must Be Eygption And Must Be 11 Digit' : '' : (e.target.name == "password") ? (!(/^[A-Za-z0-9.$_@#]{6,}[.$_@#]{1,}$/i.test(e.target.value))) ? 'Password Must Start with 3 or more character and at least one special character' : '' : (e.target.name == "confirmPassword") ? (e.target.value != userData.password) ? 'Not Matched With Password' : '' : '' });
        hasError = true;
    }
    const navigate = useNavigate();
    const handleSubmit = (e) => {

        e.preventDefault();
        Object.entries(userData).forEach(([key, value]) => {
            if (value == "") {
                setError((errors) => ({ ...errors, [key]: `${key} Is Required` }));
                hasError = true;
            }
            if (!hasError) {
                const payload = {
                    first_name: userData.firstName,
                    last_name: userData.lastName,
                    email: userData.email,
                    password: userData.password,
                    mobile_phone: `+2${userData.phone}`
                };
                // navigate('/login');
                axios.post('http://127.0.0.1:8000/api/register/',payload).then((res)=>navigate('/login')).catch((rej)=>console.log(rej));
                // fetch('http://127.0.0.1:8000/api/register/', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify(payload),
                // })
                //     .then(response => response.json())
                //     .then(data => {
                //         if (data.message === 'User created successfully') {
                //             history.push('/login');
                //         }
                //     })
                //     .catch(error => setError("Something went wrong!"));
            }
        });
    }
    // useEffect(() => {
    //     axios.get("http://127.0.0.1:8000/api/register/")
    //         .then((res) => console.log(res))
    //         .catch((err) => console.log(err));
    // }, []);
    return (
        <>
            <div className="parent" style={{ height: '800px' }}>
                <Container style={{ height: '100%' }}>
                    <div className="d-flex flex-column justify-content-center align-items-center" style={{ height: '100%' }}>
                        <h1 className="p-3">Register Now</h1>
                        <form className="col-4" onSubmit={handleSubmit} method="POST">
                            <div className="mb-3">
                                <label className="form-label">First Name</label>
                                <input
                                    type="text"
                                    className={`form-control ${(errors.firstName) ? 'is-invalid' : ''} `}
                                    value={userData.firstName}
                                    onChange={hadleEnteredData}
                                    name="firstName"
                                />
                                {(errors?.firstName) ?
                                    <small id="fileHelpId" className="form-text text-danger fw-bolder text-capitalize">{errors.firstName}</small>
                                    : ''
                                }
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Last Name</label>
                                <input
                                    type="text"
                                    className={`form-control ${(errors.lastName) ? 'is-invalid' : ''} `}
                                    value={userData.lastName}
                                    onChange={hadleEnteredData}
                                    name="lastName"
                                />
                                {(errors?.lastName) ?
                                    <small id="fileHelpId" className="form-text text-danger fw-bolder text-capitalize">{errors.lastName}</small>
                                    : ''
                                }
                            </div>
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
                                    <small id="fileHelpId" className="form-text text-danger fw-bolder text-capitalize">{errors.email}</small>
                                    : ''
                                }
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Mobile Number</label>
                                <input
                                    type="tel"
                                    className={`form-control ${(errors.phone) ? 'is-invalid' : ''} `}
                                    value={userData.phone}
                                    onChange={hadleEnteredData}
                                    name="phone"
                                />
                                {(errors?.phone) ?
                                    <small id="fileHelpId" className="form-text text-danger fw-bolder text-capitalize">{errors.phone}</small>
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
                                    <small id="fileHelpId" className="form-text text-danger fw-bolder text-capitalize">{errors.password}</small>
                                    : ''
                                }
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    className={`form-control ${(errors.confirmPassword) ? 'is-invalid' : ''} `}
                                    value={userData.confirmPassword}
                                    onChange={hadleEnteredData}
                                    name="confirmPassword"
                                />
                                {(errors?.confirmPassword) ?
                                    <small id="fileHelpId" className="form-text text-danger fw-bolder text-capitalize">{errors.confirmPassword}</small>
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
export default Register;