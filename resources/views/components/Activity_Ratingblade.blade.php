<div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 p-4">
    @if($activity->logo)
        <img src="{{ asset('storage/' . $activity->logo) }}" alt="{{ $activity->name }}" class="w-full h-48 object-cover">
    @else
        <img src="{{ asset('images/default-activity.jpg') }}" alt="صورة افتراضية" class="w-full h-48 object-cover">
    @endif

    <div class="p-4 text-center"> <!-- محاذاة النص في المنتصف -->
        <h3 class="text-lg font-bold text-gray-800">{{ $activity->name }}</h3>

        <div class="mt-4 flex flex-col items-center space-y-2"> <!-- الأزرار متعامدة -->
            <form action="{{ route('activity.details', $activity->id) }}" method="GET">
                <button class="join-btn">
                Participants Rating
                </button>
            </form>
            <form action="{{ route('activities.leave', $activity->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="join-btn">
                    Activity Rating
                    </button>
                </form>
            @if(isset($joinable) && $joinable)
                <form action="{{ route('activities.join', $activity->id) }}" method="POST">
                    @csrf
                    <button type="submit"class="join-btn">
                        انضمام
                    </button>
                </form>
            @endif

            @if(isset($leavable) && $leavable)
                <form action="{{ route('activities.leave', $activity->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="leave-btn">
                    Activity Rating
                    </button>
                </form>
                
            @endif
        </div>
    </div>
</div>
