import { useRouter } from "next/router"

export default function About1({ params }: { params: { id: string } }){
    const router = useRouter()
    const id = router.query.id
    return (
        <>About {id}</>
    )
}