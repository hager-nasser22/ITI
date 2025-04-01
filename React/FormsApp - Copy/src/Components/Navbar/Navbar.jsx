import { Link } from "react-router";

const Navbar = () => {
    return (
        <>
            <nav className="navbar bg-dark border-bottom border-body navbar-expand-lg" data-bs-theme="dark">
                <div className="container-fluid">
                    <Link className="navbar-brand" to="/">App</Link>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div className="navbar-nav">
                            <Link className="nav-link active" aria-current="page" to="/">Home</Link>
                            <Link className="nav-link" to='/register'>Register</Link>
                            <Link className="nav-link" to="/">Pricing</Link>
                        </div>
                    </div>
                </div>
            </nav>
        </>
    )
}
export default Navbar;