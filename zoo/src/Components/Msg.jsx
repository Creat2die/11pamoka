function Msg({msg}){
    if(msg === null){
        return null;
    }

    return (
        <div class="msg-bin">
            <div class="msg">
                {msg}
            </div>
        </div>
    )
}


export default Msg;