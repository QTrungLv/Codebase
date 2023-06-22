import { AiFillGoogleCircle } from 'react-icons/ai'

export default function Login(){
    return (
        <div className="flex align-middle justify-center mx-10">
            <div className="p-6">
                <div>
                    <div className="text-2xl font-bold text-black tracking-wider">Login to Pionero Attendance</div>
                    <button className="flex flex-row border">
                        <AiFillGoogleCircle /> Continue with Google
                    </button>
                </div>
            </div>
        </div>
    )
}