<div class="card">
    @if($activity->logo)
        <img src="{{ asset('storage/' . $activity->logo) }}" alt="{{ $activity->name }}" class="activity-img">
    @else
        <img src="{{ asset('images/default-activity.jpg') }}" alt="صورة افتراضية" class="activity-img">
    @endif

    <div class="card-content">
    <div class="mt-4 flex justify-between items-center">        <h3>{{ $activity->name }}</h3>
    <span class="tag">التصنيف:{{ $activity->category?? 'غير محدد'}}</span> </div>

                            <p>{{ $activity->description }}</p>
                            <div class="info">
                                <span>📍 {{ $activity->location }}</span>
                                <span class="price">💰 {{ $activity->price }} ريال</span>
                            </div>
   

        <div class="mt-4 flex justify-between items-center">
        <form action="{{ route('activity.details', $activity->id) }}" method="GET">
                                    <button class="details-btn">تفاصيل للنشاط</button>
                                </form>

            @if(isset($joinable) && $joinable)
            <form id="join-form-{{ $activity->id }}" action="{{ route('activities.register', $activity->id) }}" method="POST" onsubmit="handleJoin(event, {{ $activity->id }})">
    @csrf
    <button type="submit" class="join-btn" onclick="joinActivity('{{ $activity->name }}')">
        انضمام
    </button>
</form>


            @endif

            @if(isset($leavable) && $leavable)
                <form action="{{ route('activities.leave', $activity->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                        خروج
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
