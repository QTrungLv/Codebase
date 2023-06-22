

export default function Post({ details }: any) {
    return (
        <>
            <div className="bold self-center mb-2 font-medium text-xl">{details.title}</div>
            <div className="ml-4">{details.description}</div>
        </>
    )
}